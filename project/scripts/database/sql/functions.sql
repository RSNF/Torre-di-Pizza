CREATE OR REPLACE FUNCTION pizzaria.sum_preco_bebida() RETURNS TRIGGER AS
$sum_preco_bebida$
BEGIN
  UPDATE pizzaria.pedido SET preco_total = preco_total + (
    SELECT pb.preco
    FROM pizzaria.bebidas pb
    WHERE pb.id = NEW.bebida_id
  ) WHERE id = NEW.pedido_id;
  RETURN NEW;
END;
$sum_preco_bebida$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION pizzaria.subtract_preco_bebida() RETURNS TRIGGER AS
$subtract_preco_bebida$
BEGIN
  UPDATE pizzaria.pedido SET preco_total = preco_total - (
    SELECT pb.preco
    FROM pizzaria.bebidas pb
    WHERE pb.id = OLD.bebida_id
  ) WHERE id = OLD.pedido_id;
  RETURN OLD;
END;
$subtract_preco_bebida$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION pizzaria.sum_preco_pizza() RETURNS TRIGGER AS
$sum_preco_pizza$
BEGIN
  UPDATE pizzaria.pedido SET preco_total = preco_total + (
    SELECT preco FROM pizzaria.tamanhos A JOIN (SELECT * FROM pizzaria.pizzas
    WHERE pizza_id = NEW.pizza_id) B ON B.tamanho_id = A.tamanho_id
  ) + (
    SELECT sum(preco)
    FROM (pizzaria.pizzas JOIN pizzaria.coberturas_pizza ON id = pizza_id) A JOIN pizzaria.coberturas B ON A.cobertura_id = B.id
    WHERE A.id = NEW.pizza_id
  ) WHERE id = NEW.pedido_id;
  RETURN NEW;
END;
$sum_preco_pizza$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION pizzaria.subtract_preco_pizza() RETURNS TRIGGER AS
$subtract_preco_pizza$
BEGIN
  UPDATE pizzaria.pedido SET preco_total = preco_total - (
    SELECT preco FROM pizzaria.tamanhos A JOIN (SELECT * FROM pizzaria.pizzas
    WHERE pizza_id = OLD.pizza_id) B ON B.tamanho_id = A.tamanho_id;
  ) - (
    SELECT sum(preco)
    FROM (pizzaria.pizzas JOIN pizzaria.coberturas_pizza ON id = pizza_id) A JOIN pizzaria.coberturas B ON A.cobertura_id = B.id
    WHERE A.id = OLD.pizza_id
  ) WHERE id = OLD.pedido_id;
  RETURN OLD;
END;
$subtract_preco_pizza$ LANGUAGE plpgsql;
