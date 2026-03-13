#!/bin/bash

is_installed() {
    command -v "$1" >/dev/null 2>&1
}

if is_installed docker; then
    echo "Docker уже установлен: $(docker -v | head -n 1)"
else
    echo "--- Installing Docker ---"
    curl -fsSL https://get.docker.com -o get-docker.sh; sudo sh get-docker.sh
    sudo usermod -aG docker $USER
fi

echo "--- Updating package list and installing system dependencies ---"
sudo apt update -y
sudo apt install -y software-properties-common unzip curl git
sleep 5

echo "--- Installing Laravel framework ---"
git clone https://github.com/dregore/Laravel-Impersonate.git && cd Laravel-Impersonate
cp .env.example .env
echo "--- DOCKER BUILD ---"
sudo docker compose up -d --build
echo "--- Waiting for services to stabilize (15s) ---"
sleep 15

echo "--- BREEZE ---"
sudo docker compose exec app php artisan breeze:install blade --no-interaction
sleep 5
echo "--- COPY COPY ---"
cp routes/web.php.original routes/web.php
cp resources/views/dashboard.blade.php.original resources/views/dashboard.blade.php

echo "--- Creating admin user: admin@example.com, password123 ---"
sudo docker compose exec app php artisan db:seed --class=AdminSeeder

echo "--- Installation complete! ---"
echo "Your Laravel project is located in Laravel-Impersonate subdirectory"
echo "You can reach it on http://api.localhost:8080"
echo "Register any new user"
echo "Login under admin"
echo "Impersonate first user"
