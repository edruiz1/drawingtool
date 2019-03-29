# PHP Drawing Tool Code Challenge

This is a code challenge developed by Eduardo Ruiz using Docker, Docksal and Symfony 4.

## Setup instructions

### Step #1: Docker and Docksal environment setup

**This is a one time setup - skip this if you already have a working Docker and Docksal environment.**

Follow [Docker setup instructions](https://docs.docker.com/install/)
Follow [Docksal environment setup instructions](https://docs.docksal.io/en/master/getting-started/env-setup)

### Step #2: Project setup

1. Clone this repo into your Projects directory

    ```
    git clone https://github.com/edruiz1/drawingtool drawingtool
    cd drawingtool
    ```

2. Initialize the site

    This will initialize local settings and install the site connection file.

    ```
    fin init
    ```

3. Point your browser to

    ```
    http://drawingtool.docksal
    ```

4. Run tests
    ```
    ./bin/phpunit
    ```
