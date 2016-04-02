package com.hackupcteam.itrash;

/**
 * Created by Marc on 02/04/2016.
 */
public class Product {
    private int id;
    private String name;
    private String marca;
    private String link;
    private String precio;

    public Product () {};

    public Product (int id, String name, String marca, String link, String precio) {
        this.id = id;
        this.name = name;
        this.marca = marca;
        this.link = link;
        this.precio = precio;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getMarca() {
        return marca;
    }

    public void setMarca(String marca) {
        this.marca = marca;
    }

    public String getLink() {
        return link;
    }

    public void setLink(String link) {
        this.link = link;
    }

    public String getPrecio() {
        return precio;
    }

    public void setPrecio(String precio) {
        this.precio = precio;
    }
}
