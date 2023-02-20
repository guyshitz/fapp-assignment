<?php
use JsonMachine\JsonDecoder\ExtJsonDecoder;
use \JsonMachine\Items;

class JSONTable {

    const TABLES_DIR = "tables"; //directory of JSON tables

    private string $path;

    public function __construct(string $table_name) {
        $this->path = self::TABLES_DIR . DIRECTORY_SEPARATOR . "$table_name.json";
    }

    /**
     * @return array
     */
    protected function getData(): array {
        return file_exists($this->path) ? json_decode(file_get_contents($this->path), true) : [];
    }

    /**
     * @return Items|array
     * @throws \JsonMachine\Exception\InvalidArgumentException
     *
     * Better be used in READ cases for better performance at large scale
     */
    protected function getReadableData(): Items|array
    {
        return file_exists($this->path) ? Items::fromFile($this->path, ['decoder' => new ExtJsonDecoder(true)]) : [];
    }

    /**
     * Better be used in C(R)UD cases in order to handle large tables in a more efficient way by avoiding memory usage
     */
    protected function saveData(array $table_data): void {
        $json_data = json_encode($table_data);
        file_put_contents($this->path, $json_data);
    }
}