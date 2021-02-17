<?php

function csvToArray($filePath = '', $delimiter = ','): array
{
    if (!file_exists($filePath) || !is_readable($filePath))
        return ["error" => "file not exist or not readable"];

    $header = null;
    $data = array();
    if (($handle = fopen($filePath, 'r')) !== false)
    {
        while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
        {
            if (!$header)
                $header = $row;
            else
                $data[] = array_combine($header, $row);
        }
        fclose($handle);
    }

    return $data;
}
