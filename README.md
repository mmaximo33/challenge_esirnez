# Challenge esirneZ 

## Table of contents

- [Intro](#intro)
- [Setup environment](#setup-environment)
    - [Requirements](#requirements)
    - [Commands](#commands)
    - [Install](#Install)
        - [Clone repository](#clone-repository)
        - [Start project](#start-project)
        - [Check status](#check-status)
        - [Custom Domains](#custom-domains)

## Intro

See [Original requirements](docs/requirements.md)

## Setup environment
### requirements
- GIT
- Docker
- Docker-compose or docker compose (v2)

(*) Validated in Linux based environments

### Commands

- `bin/docker` {up | start | stop | allstop | restart | logs | removeproject}

### Install

#### Clone repository
```sh
mkdir -p ~/domains/challenge_esirnez
cd $_

git clone https://github.com/mmaximo33/challenge_esirnez ./
```

#### Start project
```sh
chmod +x bin/*

bin/docker up
```

#### Check status
Check the following urls
```sh
#App
http://localhost/

#Phpmyadmin
http://localhost:8080
```

#### Custom Domains
You can create a custom domain by replacing **mydomain.lcl** from the following command
```sh
grep -qxF '127.0.0.1 mydomain.lcl' /etc/hosts || echo "127.0.0.1 mydomain.lcl" | sudo tee -a /etc/hosts
```