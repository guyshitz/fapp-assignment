<?php

class TableController extends JSONTable {
    /**
     * @param array|\JsonMachine\Items $data
     * @param int|string $search_id
     * @return array|false
     *
     * Loops through all records searching for data by the given ID
     */
    private function getRowByID(array|\JsonMachine\Items $data, int|string $search_id): array|false {
        foreach($data as $key => $row)
            if($row['id'] == $search_id)
                return [$key => $row];

        return false;
    }

    public function addRow(array $data): void {
        $table_data = $this->getData();
        $table_data[] = $data;
        $this->saveData($table_data);
    }

    /**
     * @param int|string $row_id
     * @return array|false
     * @throws \JsonMachine\Exception\InvalidArgumentException
     *
     * Returns a readable row as array, or false if not found
     */
    public function getRow(int|string $row_id): array|false {
        $table_data = $this->getReadableData();
        return $this->getRowByID($table_data, $row_id);
    }

    public function editRow(int|string $row_id, array $new_data): void {
        $table_data = $this->getData();

        $row = $this->getRowByID($table_data, $row_id);

        if($r = current($row))
            $table_data[array_key_first($row)] = array_merge($r, $new_data); //updates the row data

        $this->saveData($table_data);
    }

    public function deleteRow(int|string $row_id): void {
        $table_data = $this->getData();

        $row = $this->getRowByID($table_data, $row_id);

        if($row !== false)
            unset($table_data[array_key_first($row)]);

        $this->saveData($table_data);
    }
}
