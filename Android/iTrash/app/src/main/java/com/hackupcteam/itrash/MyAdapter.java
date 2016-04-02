package com.hackupcteam.itrash;

import android.content.Context;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.os.AsyncTask;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.ImageButton;
import android.widget.ImageView;
import android.widget.TextView;

import java.io.InputStream;
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

        new ImageDownloader(img).execute(link);

        return item;
    }


    class ImageDownloader extends AsyncTask<String, Void, Bitmap> {
        ImageView bmImage;

        public ImageDownloader(ImageView bmImage) {
            this.bmImage = bmImage;
        }

        protected Bitmap doInBackground(String... urls) {
            String url = urls[0];
            Bitmap mIcon = null;
            try {
                InputStream in = new java.net.URL(url).openStream();
                mIcon = BitmapFactory.decodeStream(in);
            } catch (Exception e) {
                Log.e("Error", e.getMessage());
            }
            return mIcon;
        }

        protected void onPostExecute(Bitmap result) {
            bmImage.setImageBitmap(result);
        }
    }
}

