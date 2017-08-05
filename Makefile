PROJECT_ROOT:=$(abspath ${CURDIR})
TEST_OUTPUT=${PROJECT_ROOT}/tests.log

PURPLE=\\033[1;35m
NO_COLOR=\033[0m
RED=\\033[1;31m
GREEN=\\033[1;32m
YELLOW=\\033[1;33m

install-db:
	@sh db-install.sh

provision: init-db
