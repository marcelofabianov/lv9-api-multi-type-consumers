alias lv.cat="cat alias.sh"
alias lv.info="docker container ls -a"
alias lv.ls="docker compose ls"
alias lv.logs="docker compose logs"
alias lv.restart="docker compose restart"
alias lv.refresh="docker compose down && docker compose up -d"
alias lv.watch="docker compose up"
alias lv.up="docker compose up -d"
alias lv.down="docker compose down"
alias lv.prune="docker container prune && docker volume prune && docker network prune"
alias lv.bash="docker exec -it lv bash"
alias lv.exec="docker exec lv"
alias lv.php="lv.exec php"
alias lv.art="lv.php artisan"
alias lv.init="cp docker/.env.example .env && lv.composer install && lv.art key:generate"
alias lv.cache-clear="lv.art view:clear && lv.art route:clear && lv.art config:clear"
alias lv.cache="lv.art view:cache && lv.art config:cache && lv.art route:cache"
alias lv.cache-refresh="lv.cache-clear && lv.cache"
alias lv.composer="lv.exec composer"
alias lv.feature="git checkout develop && git pull origin develop && git checkout -b"
alias lv.migrate="lv.art migrate"
alias lv.seed="lv.art db:seed"
alias lv.ip='docker inspect lv_http | grep "IPAddress"'
alias lv.test="lv.art test --env=testing"
alias lv.lint="lv.php ./vendor/bin/pint"
alias lv.captainhook="lv.php ./vendor/bin/captainhook"
alias lv.psalm="lv.php ./vendor/bin/psalm"
alias lv.phpmd="./vendor/bin/phpmd . text phpmd.xml"
alias lv.ip='docker inspect lv_http | grep "IPAddress"'
alias lv.god='echo "[pint]" && lv.lint && echo "[psalm]" && lv.psalm && echo "[phpmd]" && lv.phpmd && echo "[pest]" && lv.test'
alias lv.pre-commit="lv.lint && lv.psalm && lv.test"
alias lv.commit="git commit -m"
alias lv.redis-clear="docker exec -it lv_cache_db redis-cli FLUSHALL"
alias lv.gs="lv.pre-commit && git add . && git status"
alias lv.gg="git commit -m"
alias lv.push="git push origin"
alias lv.db="lv.art migrate:fresh && lv.art db:seed >> .oauth.json"
