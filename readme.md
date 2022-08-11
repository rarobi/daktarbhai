## Daktarbhai Frontend Application

Daktarbhai Frontend Application will be the web based client that will be totally depend on daktarbhai core api.

### Wiki

All the related doc and info will be recorded at the [wiki](https://gitlab.com/hc4u/teledaktar-issue-tracker/wikis/home).

### Issues

[Project Issue Tracker](https://gitlab.com/hc4u/teledaktar-issue-tracker/issues) will be used for all the time.


### Contributing

We need to follow a number of rules to contribute to this project
* No one will push any commit directly to the `master` branch
* `development` branch should have the latest working copy
* It is better to use separate branch to each individual/ feature/ issue
* Each `merge request` to `development`branch must have mentioned the issue number(s)
* `Code Indentation` is a must
* Try to write `comments` within the code as much as possible


### Installation

Follow the instructions below to install the project

* Clone the repository using `git clone git@gitlab.com:hc4u/daktarbhai/web-stack.git`
* Create `.env` by copying the `env.example` file
* `composer install`
* `npm install`
* `php artisan key:generate`
* `update API_DOMAIN_URL`
* `update IMAGE_ROOT_URL`

--
