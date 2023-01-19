<?php
function readDb($table) {
    $data = json_decode(file_get_contents('C:\xampp\htdocs\SEMINAR\proiectpwa\db.json'), true);
    return $data[$table];
}

function readTodos() {
    $todos = readDb('todos');
    $filteredTodos = array_filter($todos, function($todo) {
        return $todo['id_user'] === $_SESSION['id_user'];
    });
    return $filteredTodos;
}

function readEvents() {
  $events = readDb('events');
  $filteredEvents = array_filter($events, function($event) {
      return $event['id_user'] === $_SESSION['id_user'];
  });
  return $filteredEvents;
}

function auth($user, $password) {
    $users = readDb('users');
    $filteredUsers = array_filter($users, function($item) use ($user, $password) {
        return $item['username'] === $user && password_verify($password, $item['password']);
    });
    return count($filteredUsers) > 0 ? current($filteredUsers) : false;
}

