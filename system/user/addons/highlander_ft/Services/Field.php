<?php

namespace Mithra62\HighlanderFt\Services;

class Field
{
    /**
     * @param $data
     * @param int $field_id
     * @param int $content_id
     * @param string $mode
     * @return string|true
     */
    public function validate($data, int $field_id, int $content_id, string $mode = 'all')
    {
        $table_name = 'channel_data_field_' . $field_id;
        $field_column = 'field_id_' . $field_id;
        $channel_id = $this->getChannelId($content_id);
        if (ee()->db->table_exists($table_name)) {

            $query = ee()->db->select()->from($table_name)
                ->where([$field_column => $data])
                ->join('channel_titles', 'channel_titles.entry_id = ' . $table_name . '.entry_id');

            if ($content_id) {
                ee()->db->where([$table_name . '.entry_id !=' => $content_id]);
            }

            if ($mode != 'all' && $channel_id) {
                ee()->db->where(['channel_titles.channel_id' => $channel_id]);
            }

            if ($channel_id) {
                ee()->db->where(['channel_id' => $channel_id]);
            }

            $result = $query->get();
            if ($result->num_rows() >= 1) {
                $entry_id = $result->row('entry_id');
                $title = $result->row('title');
                return 'Already used on the Entry: ' . $title . ' (' . $entry_id . ')';
            }
        }

        return true;
    }

    /**
     * @param int $entry_id
     * @return int|null
     */
    protected function getChannelId(int $entry_id): ?int
    {
        if (!$entry_id) {
            return ee()->input->post('channel_id');
        }

        $query = ee()->db->select('channel_id')->from('channel_titles')
            ->where(['entry_id' => $entry_id])
            ->limit(1)
            ->get();

        $return = null;
        if($query->row('channel_id')) {
            $return = $query->row('channel_id');
        }

        return $return;
    }
}