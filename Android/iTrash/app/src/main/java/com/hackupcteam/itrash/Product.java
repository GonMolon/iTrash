package com.hackupcteam.itrash;

/**
 * Created by Marc on 02/04/2016.
 */
public class Product {
    private Long id;
    private String name;
    private String marca;
    private String link;
    private String precio;
    private String time;

    public Product () {};

    public Product (Long id, String name, String marca, String link, String precio,String time) {
        this.id = id;
        this.name = name;
        this.marca = marca;
        this.link = link;
        this.precio = precio;
        this.time = time;
    }

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
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
    public void setTime(String time) {
        this.time = time;
    }
    public String getTime(){return time;}

}
