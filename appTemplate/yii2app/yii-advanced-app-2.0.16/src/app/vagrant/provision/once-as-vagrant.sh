#!/usr/bin/env bash

source /app/app/vagrant/provision/common.sh

#== Import script args ==

github_token=$(echo "$1")

#== Provision script ==

info "Provision-script user: `whoami`"

cd /app/yii2

info "Configure composer"
composer config --global github-oauth.github.com ${github_token}
echo "Done!"

info "Install project dependencies"
composer --no-progress --prefer-dist install

info "Init project"
cd /app/app
./init --env=Development --overwrite=y

info "Apply migrations"
./yii migrate --interactive=0
./yii_test migrate --interactive=0

info "Create bash-alias 'app' for vagrant user"
echo 'alias app="cd /app/app"' | tee /home/vagrant/.bash_aliases

info "Enabling colorized prompt for guest console"
sed -i "s/#force_color_prompt=yes/force_color_prompt=yes/" /home/vagrant/.bashrc
