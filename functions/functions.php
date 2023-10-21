<?php

function getAll($tbname)
{
    global $conn;

    $query = "SELECT * FROM " . $tbname;
    $result = pg_query($conn, $query);

    if (!$result) {
        echo "Error when mining data!";
        exit;
    }

    while ($row = pg_fetch_assoc($result)) {
        $results[] = $row;
    }

    return $results;
}

function getById($id)
{
    global $conn;

    $query = "SELECT * FROM mining_tb WHERE mine_id = " . $id;
    $result = pg_query($conn, $query);

    if (!$result) {
        return "Error when mining data!";
    }

    while ($row = pg_fetch_assoc($result)) {
        $results[] = $row;
    }

    return $results[0];
}

function insert($data)
{
    global $conn;

    $mine_color = $data['mine_color'];
    $owner = $data['install_owner'];

    $query = "INSERT INTO mining_tb(mine_color,install_owner) VALUES('$mine_color','$owner')";

    $insert = pg_query($conn, $query);

    return pg_affected_rows($insert);
}

function update($data)
{
    global $conn;

    $mine_color = $data['mine_color'];
    $owner = $data['install_owner'];
    $id = $data['mine_id'];

    $query = "UPDATE mining_tb SET
        mine_color = '$mine_color',
        install_owner = '$owner'
        WHERE mine_id = $id";

    $insert = pg_query($conn, $query);

    return pg_affected_rows($insert);
}

function delete($id)
{
    global $conn;
    $query = "DELETE FROM mining_tb WHERE mine_id =" . $id;
    $delete = pg_query($conn, $query);

    return pg_affected_rows($delete);
}
