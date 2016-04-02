package com.hackupcteam.itrash;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.ImageView;
import android.widget.TextView;

import java.util.ArrayList;

/**
 * Created by Hermes on 02/04/2016.
 */
public class MyAdapterCesta extends ArrayAdapter<Product> {

    public MyAdapterCesta(Context context, int resource, ArrayList<Product> items) {
        //Resource is item_list.xml
        super(context, resource, items);
    }

    @Override
    public View getView(int position, View convertView, ViewGroup parent) {
        LayoutInflater inflater = LayoutInflater.from(getContext());
        View item = inflater.inflate(R.layout.item_cesta, parent, false);

        Product single_item = getItem(position);

        TextView name = (TextView)item.findViewById(R.id.name);
        TextView marca = (TextView)item.findViewById(R.id.marca);
        TextView precio = (TextView)item.findViewById(R.id.precio);
        ImageView img = (ImageView)item.findViewById(R.id.product_image);

        name.setText(single_item.getName());
        marca.setText(single_item.getMarca());
        precio.setText(single_item.getPrecio());
        String link = single_item.getLink();

        return item;
    }


}
