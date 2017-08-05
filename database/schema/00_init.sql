CREATE EXTENSION pgcrypto;
CREATE EXTENSION "uuid-ossp";

DROP ROLE IF EXISTS bluereadrole;
DROP ROLE IF EXISTS bluewriterole;

CREATE ROLE bluereadrole;
CREATE ROLE bluewriterole;

CREATE SCHEMA apisp;
GRANT ALL ON SCHEMA apisp TO bluewriterole;
GRANT USAGE ON SCHEMA apisp TO bluereadrole;
