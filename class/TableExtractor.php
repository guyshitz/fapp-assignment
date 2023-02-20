<?php

class TableExtractor extends JSONTable {
    /**
     * @throws \JsonMachine\Exception\InvalidArgumentException
     */
    public function printData(array $columns): void {
        $table_data = $this->getReadableData();

        foreach ($table_data as $row) {
            $filtered_data = [];
            foreach($columns as $column)
                if(isset($row[$column]))
                    $filtered_data[$column] = $row[$column];

            if(!empty($filtered_data))
                echo implode(", ", $filtered_data) . '<br>';
        }
    }
}