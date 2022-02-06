<?php

function getItemById(int $id, array $items)
{
    foreach ($items as $item) {
        if ($id == $item["id"]) {
            return $item;
        }
    }

    return false;
}
