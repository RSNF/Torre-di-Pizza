CREATE TABLE IF NOT EXISTS pizzaria.usuario (
    "id"                SERIAL,
    "nome"              VARCHAR(255)            NOT NULL,
    "senha"             VARCHAR(255)            NOT NULL,
    "tel"               pizzaria.telefone       NOT NULL,
    "endereco"          VARCHAR(255)            NOT NULL,
    PRIMARY KEY("id")
);

CREATE TABLE IF NOT EXISTS pizzaria.cartao_credito (
    "id"                SERIAL,
    "nome"              VARCHAR(255)            NOT NULL,
    "numero"            VARCHAR(16)             NOT NULL,
    "expiracao"         pizzaria.data_expiracao NOT NULL,
    "usuario_id"        INTEGER                 NOT NULL,
    UNIQUE("numero"),
    PRIMARY KEY("usuario_id")
);

CREATE TABLE IF NOT EXISTS pizzaria.pedido (
    "id"                SERIAL,
    "preco_total"       NUMERIC(10, 2)          NOT NULL    DEFAULT 0.00,
    "usuario_id"        INTEGER                 NOT NULL,
    "comentario"        TEXT,
    PRIMARY KEY("id")
);

CREATE TABLE IF NOT EXISTS pizzaria.pedido_tem_bebidas (
    "id"                SERIAL,
    "pedido_id"         INTEGER                 NOT NULL,
    "bebida_id"         INTEGER                 NOT NULL
);

CREATE TABLE IF NOT EXISTS pizzaria.pedido_tem_pizzas (
    "id"                SERIAL,
    "pedido_id"         INTEGER                 NOT NULL,
    "pizza_id"          INTEGER                 NOT NULL
);

CREATE TABLE IF NOT EXISTS pizzaria.pizzas (
    "id"                SERIAl,
    "nome"              VARCHAR(255)            NOT NULL,
    "tamanho_id"        INTEGER                 NOT NULL,
    "descricao"         TEXT,
    PRIMARY KEY("id")
);

CREATE TABLE IF NOT EXISTS pizzaria.tamanhos (
    "id"                SERIAL,
    "nome"              VARCHAR(255)            NOT NULL,
    "preco"             NUMERIC(10, 2)          NOT NULL,
    UNIQUE("nome"),
    PRIMARY KEY("id")
);

CREATE TABLE IF NOT EXISTS pizzaria.coberturas (
    "id"                SERIAL,
    "nome"              VARCHAR(255)            NOT NULL,
    "preco"             NUMERIC(10, 2)          NOT NULL,
    UNIQUE("nome"),
    PRIMARY KEY("id")
);

CREATE TABLE IF NOT EXISTS pizzaria.coberturas_pizza (
    "id"                SERIAL,
    "pizza_id"          INTEGER                 NOT NULL,
    "cobertura_id"      INTEGER                 NOT NULL
);

CREATE TABLE IF NOT EXISTS pizzaria.bebidas (
    "id"                SERIAL,
    "nome"              VARCHAR(255)            NOT NULL,
    "preco"             NUMERIC(10, 2)          NOT NULL,
    UNIQUE("nome"),
    PRIMARY KEY("id")
);

ALTER TABLE pizzaria.pedido_tem_bebidas
    ADD CONSTRAINT "fk_pb_pid" FOREIGN KEY("pedido_id") REFERENCES pizzaria.pedido ("id") ON DELETE CASCADE,
    ADD CONSTRAINT "fk_pb_bid" FOREIGN KEY("bebida_id") REFERENCES pizzaria.bebidas ("id") ON DELETE CASCADE;

ALTER TABLE pizzaria.pedido_tem_pizzas
    ADD CONSTRAINT "fk_pp_pid" FOREIGN KEY("pedido_id") REFERENCES pizzaria.pedido ("id") ON DELETE CASCADE,
    ADD CONSTRAINT "fk_pp_pzid" FOREIGN KEY("pizza_id") REFERENCES pizzaria.pizzas ("id") ON DELETE CASCADE;

ALTER TABLE pizzaria.cartao_credito
    ADD CONSTRAINT "fk_cc_uid" FOREIGN KEY("usuario_id") REFERENCES pizzaria.usuario ("id") ON DELETE CASCADE;

ALTER TABLE pizzaria.pizzas
    ADD CONSTRAINT "fk_pz_tid" FOREIGN KEY("tamanho_id") REFERENCES pizzaria.tamanhos ("id") ON DELETE CASCADE;

ALTER TABLE pizzaria.coberturas_pizza
    ADD CONSTRAINT "fk_cp_pid" FOREIGN KEY("pizza_id") REFERENCES pizzaria.pizzas ("id") ON DELETE CASCADE,
    ADD CONSTRAINT "fk_cp_cid" FOREIGN KEY("cobertura_id") REFERENCES pizzaria.coberturas ("id") ON DELETE CASCADE;

CREATE TRIGGER trigger_preco_sum_bebidas AFTER INSERT ON pizzaria.pedido_tem_bebidas FOR EACH ROW EXECUTE PROCEDURE sum_preco_bebida();
CREATE TRIGGER trigger_preco_subtract_bebidas AFTER DELETE ON pizzaria.pedido_tem_bebidas FOR EACH ROW EXECUTE PROCEDURE subtract_preco_bebida();

CREATE TRIGGER trigger_preco_sum_pizzas AFTER INSERT ON pizzaria.pedido_tem_pizzas FOR EACH ROW EXECUTE PROCEDURE sum_preco_pizza();
CREATE TRIGGER trigger_preco_subtract_pizzas AFTER DELETE ON pizzaria.pedido_tem_pizzas FOR EACH ROW EXECUTE PROCEDURE subtract_preco_pizza();