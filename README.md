# Docker Deployment Guide for Dockerized Laravel 12 Starter

This guide will help you deploy the Dockerized Laravel 12 Starter application using Docker. The application consists of a Laravel backend, React frontend, MySQL database, and Redis server, all running in separate containers.

## Prerequisites

- Docker installed on your machine
- Docker Compose installed on your machine
- Git (optional, for cloning the repository)

## Setup Steps

1. **Clone or create the project**

   Either clone the repository

2. **Set up environment variables**

   ```bash
   cp .env.example .env
   ```

   Then edit `.env` to set your desired database credentials and Pusher API keys.

3. **Build and start the containers**

   ```bash
   docker compose up -d
   ```

## Accessing the Application

Once all containers are up and running, you can access the application at:

```
http://localhost:8080
```

## Container Management

- **Start containers**
  ```bash
  docker-compose up -d
  ```

- **Stop containers**
  ```bash
  docker-compose down
  ```

- **View logs**
  ```bash
  docker-compose logs -f
  ```

- **Access a container shell**
  ```bash
  docker-compose exec app bash
  ```

## Troubleshooting

- **Database connection issues**
  Make sure the database container is running and the credentials in the `.env` file are correct.

- **File permission issues**
  If you encounter permission issues, ensure the proper ownership of directories:
  ```bash
  docker-compose exec app chown -R www-data:www-data /var/www/html/storage
  ```

- **WebSocket connection errors**
  Verify your Pusher credentials and make sure ports are not blocked by firewalls.
