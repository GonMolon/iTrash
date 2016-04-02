package com.hackupcteam.itrash;

import android.content.Context;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.os.AsyncTask;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.ImageView;
import android.widget.TextView;

import java.io.IOException;
import java.io.InputStream;
import java.net.MalformedURLException;
import java.net.URL;
import java.util.ArrayList;

public class MyAdapter extends ArrayAdapter<Product> {

    public MyAdapter(Context context, int resource, ArrayList<Product> items) {
        //Resource is item_list.xml
        super(context, resource, items);
    }

    @Override
    public View getView(int position, View convertView, ViewGroup parent) {
        LayoutInflater inflater = LayoutInflater.from(getContext());
        View item = inflater.inflate(R.layout.item_list, parent, false);

        Product single_item = getItem(position);

        TextView name = (TextView)item.findViewById(R.id.name);
        TextView marca = (TextView)item.findViewById(R.id.marca);
        TextView precio = (TextView)item.findViewById(R.id.precio);
        ImageView img = (ImageView)item.findViewById(R.id.product_image);

        name.setText(single_item.getName());
        marca.setText(single_item.getMarca());
        precio.setText(single_item.getPrecio());
        String link = single_item.getLink();
        img.setImageResource(R.mipmap.ic_launcher);

        return item;
    }

}

