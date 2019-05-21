.PHONY: install
install: ## Install dependencies
	@composer install && composer dump-autoload && php index.php

.PHONY: run
run: ## IRun the demo
	@php index.php

.PHONY: help
help:
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'

.DEFAULT_GOAL := help
