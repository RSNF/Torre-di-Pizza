SET search_path TO pizzaria;

DROP TABLE IF EXISTS pizzaria.usuario;
CREATE TABLE pizzaria.usuario (
    "usuario_id"        SERIAL,
    "nome"              VARCHAR(255)            NOT NULL,
    "senha"             VARCHAR(255)            NOT NULL,
    "tel"               pizzaria.telefone       NOT NULL,
    "endereco"          VARCHAR(255)            NOT NULL,
    "date_created"      TIMESTAMP               NOT NULL    DEFAULT NOW(),
    "date_updated"      TIMESTAMP               NOT NULL    DEFAULT NOW(),
    PRIMARY KEY ("usuario_id")
);

DROP TABLE IF EXISTS pizzaria.cartao_credito;
CREATE TABLE pizzaria.cartao_credito (
    "cartao_id"         SERIAl,
    "nome"              VARCHAR(255)            NOT NULL,
    "numero"            VARCHAR(16)             NOT NULL,
    "expiracao"         pizzaria.data_expiracao NOT NULL,
    "usuario_id"        INTEGER                 NOT NULL,
    "date_created"      TIMESTAMP               NOT NULL    DEFAULT NOW(),
    "date_updated"      TIMESTAMP               NOT NULL    DEFAULT NOW(),
    UNIQUE("numero"),
    PRIMARY KEY ("cartao_id")
);

DROP TABLE IF EXISTS pizzaria.pedido;
CREATE TABLE pizzaria.pedido (
    "pedido_id"         SERIAL,
    "preco_total"       NUMERIC(10, 2)          NOT NULL    DEFAULT 0.00,
    "usuario_id"        INTEGER                 NOT NULL,
    "comentario"        TEXT,
    "date_created"      TIMESTAMP               NOT NULL    DEFAULT NOW(),
    "date_updated"      TIMESTAMP               NOT NULL    DEFAULT NOW(),
    PRIMARY KEY("pedido_id")
);

DROP TABLE IF EXISTS pizzaria.pedido_tem_bebidas;
CREATE TABLE pizzaria.pedido_tem_bebidas (
    "ptb_id"            SERIAL,
    "pedido_id"         INTEGER                 NOT NULL,
    "bebida_id"         INTEGER                 NOT NULL,
    "date_created"      TIMESTAMP               NOT NULL    DEFAULT NOW(),
    "date_updated"      TIMESTAMP               NOT NULL    DEFAULT NOW()
);

DROP TABLE IF EXISTS pizzaria.pedido_tem_pizzas;
CREATE TABLE pizzaria.pedido_tem_pizzas (
    "ptp_id"            SERIAL,
    "pedido_id"         INTEGER                 NOT NULL,
    "pizza_id"          INTEGER                 NOT NULL,
    "date_created"      TIMESTAMP               NOT NULL    DEFAULT NOW(),
    "date_updated"      TIMESTAMP               NOT NULL    DEFAULT NOW()
);

DROP TABLE IF EXISTS pizzaria.pizzas;
CREATE TABLE pizzaria.pizzas (
    "pizza_id"          SERIAl,
    "nome"              VARCHAR(255)            NOT NULL,
    "tamanho_id"        INTEGER                 NOT NULL,
    "descricao"         TEXT,
    "date_created"      TIMESTAMP               NOT NULL    DEFAULT NOW(),
    "date_updated"      TIMESTAMP               NOT NULL    DEFAULT NOW(),
    PRIMARY KEY("pizza_id")
);

DROP TABLE IF EXISTS pizzaria.tamanhos;
CREATE TABLE pizzaria.tamanhos (
    "tamanho_id"        SERIAL,
    "nome"              VARCHAR(255)            NOT NULL,
    "preco"             NUMERIC(10, 2)          NOT NULL,
    "date_created"      TIMESTAMP               NOT NULL    DEFAULT NOW(),
    "date_updated"      TIMESTAMP               NOT NULL    DEFAULT NOW(),
    UNIQUE("nome"),
    PRIMARY KEY("tamanho_id")
);

DROP TABLE IF EXISTS pizzaria.coberturas;
CREATE TABLE pizzaria.coberturas (
    "cobertura_id"      SERIAL,
    "nome"              VARCHAR(255)            NOT NULL,
    "preco"             NUMERIC(10, 2)          NOT NULL,
    "date_created"      TIMESTAMP               NOT NULL    DEFAULT NOW(),
    "date_updated"      TIMESTAMP               NOT NULL    DEFAULT NOW(),
    UNIQUE("nome"),
    PRIMARY KEY("cobertura_id")
);

DROP TABLE IF EXISTS pizzaria.coberturas_pizza;
CREATE TABLE pizzaria.coberturas_pizza (
    "cp_id"             SERIAL,
    "pizza_id"          INTEGER                 NOT NULL,
    "cobertura_id"      INTEGER                 NOT NULL,
    "date_created"      TIMESTAMP               NOT NULL    DEFAULT NOW(),
    "date_updated"      TIMESTAMP               NOT NULL    DEFAULT NOW()
);

DROP TABLE IF EXISTS pizzaria.bebidas;
CREATE TABLE pizzaria.bebidas (
    "bebida_id"         SERIAL,
    "nome"              VARCHAR(255)            NOT NULL,
    "preco"             NUMERIC(10, 2)          NOT NULL,
    "date_created"      TIMESTAMP               NOT NULL    DEFAULT NOW(),
    "date_updated"      TIMESTAMP               NOT NULL    DEFAULT NOW(),
    UNIQUE("nome"),
    PRIMARY KEY("bebida_id")
);

-- -----------------------------
--
--
--

ALTER TABLE pizzaria.pedido
    ADD CONSTRAINT "fk_pedido_user" FOREIGN KEY ("usuario_id") REFERENCES pizzaria.usuario ("usuario_id") ON DELETE CASCADE;

-- -----------------------------
--
--
--

ALTER TABLE pizzaria.pedido_tem_bebidas
    ADD CONSTRAINT "fk_pb_pid" FOREIGN KEY("pedido_id") REFERENCES pizzaria.pedido ("pedido_id") ON DELETE CASCADE,
    ADD CONSTRAINT "fk_pb_bid" FOREIGN KEY("bebida_id") REFERENCES pizzaria.bebidas ("bebida_id") ON DELETE CASCADE;

ALTER TABLE pizzaria.pedido_tem_pizzas
    ADD CONSTRAINT "fk_pp_pid" FOREIGN KEY("pedido_id") REFERENCES pizzaria.pedido ("pedido_id") ON DELETE CASCADE,
    ADD CONSTRAINT "fk_pp_pzid" FOREIGN KEY("pizza_id") REFERENCES pizzaria.pizzas ("pizza_id") ON DELETE CASCADE;

ALTER TABLE pizzaria.cartao_credito
    ADD CONSTRAINT "fk_cc_uid" FOREIGN KEY("usuario_id") REFERENCES pizzaria.usuario ("usuario_id") ON DELETE CASCADE;

ALTER TABLE pizzaria.pizzas
    ADD CONSTRAINT "fk_pz_tid" FOREIGN KEY("tamanho_id") REFERENCES pizzaria.tamanhos ("tamanho_id") ON DELETE CASCADE;

ALTER TABLE pizzaria.coberturas_pizza
    ADD CONSTRAINT "fk_cp_pid" FOREIGN KEY("pizza_id") REFERENCES pizzaria.pizzas ("pizza_id") ON DELETE CASCADE,
    ADD CONSTRAINT "fk_cp_cid" FOREIGN KEY("cobertura_id") REFERENCES pizzaria.coberturas ("cobertura_id") ON DELETE CASCADE;

-- -----------------------------
--
-- Functions
--

CREATE TRIGGER trigger_preco_sum_bebidas AFTER INSERT ON pizzaria.pedido_tem_bebidas FOR EACH ROW EXECUTE PROCEDURE sum_preco_bebida();
CREATE TRIGGER trigger_preco_subtract_bebidas AFTER DELETE ON pizzaria.pedido_tem_bebidas FOR EACH ROW EXECUTE PROCEDURE subtract_preco_bebida();

CREATE TRIGGER trigger_preco_sum_pizzas AFTER INSERT ON pizzaria.pedido_tem_pizzas FOR EACH ROW EXECUTE PROCEDURE sum_preco_pizza();
CREATE TRIGGER trigger_preco_subtract_pizzas AFTER DELETE ON pizzaria.pedido_tem_pizzas FOR EACH ROW EXECUTE PROCEDURE subtract_preco_pizza();
