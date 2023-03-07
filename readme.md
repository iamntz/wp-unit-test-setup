## What's this?
Setting up WP testing can be tricky for the first timers. This is my attempt to make this step slightly easy.

### Tips & tricks:

- try to use unit tests (instead of integration tests) as much as possible, as these are the fastest to run;
- rely on integration tests only for tightly coupled code (e.g. dependent of other plugins);
- place all wp-dependent code into `/integration`;
- try to write tests before you write any code;

## Install

You can't install this on Windows cmd/powershell, so you'll need to install it via WSL. After that, you can run it in Windows too.

On your host machine, you'll need:

- Docker
- PHP (with XDebug)
- Composer

After you download this repo archive and extract it as `your-project-path/tests`, you will do one of the following:

#### 1. Set-up (in bash/wsl):
```
./install-wp-tests.sh
```
This will also update `docker-compose.yml` file and will set-up docker file & paths.

#### Day-to-day use:

After you set it up, you can run the  test:

```
composer run-script test-wp    # this will run all WP tests
composer run-script test-php   # this will run all phpunit tests
```
