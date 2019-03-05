SASS := $(shell command -v sassc 2> /dev/null)

VERSION := $(shell cat VERSION | tr -d "[:space:]")
COMMIT := $(shell git rev-parse --short HEAD)

default: clean compile package

deps:
ifndef SASS
	$(error "sassc is not installed")
endif

clean:
	rm -Rf build
	mkdir build

compile: deps
	cd public/css                    && sassc -mt compact screen.scss screen-${VERSION}.css
	cd data/Themes/Drupal/public/css && sassc -mt compact screen.scss screen-${VERSION}.css

package:
	rsync -rl --exclude-from=buildignore --delete . build/sidewalk
	cd build && tar czf sidewalk.tar.gz sidewalk
