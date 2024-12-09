DROP SCHEMA IF EXISTS pizzaria CASCADE;
CREATE SCHEMA IF NOT EXISTS pizzaria;

CREATE DOMAIN pizzaria.telefone AS TEXT CHECK (
    VALUE ~ '^(\+55)?\s?\(?[1-9]{2}\)?\s?[9][0-9]{3,4}\-?[0-9]{4}$'
);
COMMENT ON DOMAIN pizzaria.telefone IS 'Domain para telefones brasileiros.';

CREATE DOMAIN pizzaria.data_expiracao AS TEXT CHECK (
    VALUE ~ '^0[1-9]|1[0-2]\/[0-9]{4}$'
);
COMMENT ON DOMAIN pizzaria.data_expiracao IS 'Domain para datas de expiração de cartão de credito.';