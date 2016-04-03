package com.hackupcteam.itrash;

import android.content.Intent;
import android.net.Uri;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.ListAdapter;
import android.widget.ListView;
import android.widget.Toast;

import com.firebase.client.Firebase;

import java.util.ArrayList;

public class Cesta extends AppCompatActivity {

    private ListView miListaCesta;
    private Button btnPedido;
    private ArrayList<String> myListCart;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_cesta);
        Double precio = getIntent().getDoubleExtra("preu",0.0);
        miListaCesta = (ListView) findViewById(R.id.miListaCesta);
        btnPedido = (Button) findViewById(R.id.btnpedido);
        btnPedido.setText(String.format("Buy on lidl.de for %.2f", precio));
        btnPedido.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String url = "http://lidl.de";
                Intent i = new Intent(Intent.ACTION_VIEW);
                i.setData(Uri.parse(url));
                startActivity(i);
            }
        });
        myListCart = getIntent().getStringArrayListExtra("lista");
        Log.d("TAG",""+myListCart.toString()+"");

        ListView l1 = (ListView)findViewById(R.id.miListaCesta);

        ArrayAdapter<String> arrayAdapter = new ArrayAdapter<String>(
                this,
                android.R.layout.simple_list_item_1,
                myListCart );

        l1.setAdapter(arrayAdapter);

        for (String inte: myListCart
                ) {
            Log.d("tag", "" + inte.toString() + "");

        }

    }
}
