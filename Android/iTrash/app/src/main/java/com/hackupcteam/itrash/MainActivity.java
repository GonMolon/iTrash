package com.hackupcteam.itrash;

import android.content.Intent;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.os.AsyncTask;
import android.os.Bundle;
import android.provider.Settings;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.text.Layout;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.AdapterView;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.ListAdapter;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.Toast;

import com.firebase.client.DataSnapshot;
import com.firebase.client.Firebase;
import com.firebase.client.FirebaseError;
import com.firebase.client.ValueEventListener;

import java.io.InputStream;
import java.util.ArrayList;
import java.util.ListIterator;

public class MainActivity extends AppCompatActivity {

    private ArrayList<Product> myList;

    public ArrayList<String> ProductsAdded;
    private Button btn;
    private ListView lista1;
    private int precio = 0;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

        btn = (Button) findViewById(R.id.btnadd);

        btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Toast.makeText(getApplicationContext(), "Hello",Toast.LENGTH_SHORT).show();
                Log.d("t", "hola que tal");
                for (String inte: ProductsAdded
                        ) {
                    Log.d("tag", "" + inte + "");
                }
                Log.d("tag",myList.toString());
            }
        });

        myList = new ArrayList<Product>();
        ProductsAdded = new ArrayList<>();
        ProductsAdded.clear();

        ListAdapter adapter = new MyAdapter(this, R.layout.item_list, myList);

        final FireBase fb = new FireBase(this, myList);
        lista1 = (ListView) findViewById(R.id.miLista);
        fb.realTimeText(adapter, lista1);

        lista1.setAdapter(adapter);
        Log.d("CACA2", myList.toString());

        lista1.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
                Product p = myList.get(position);
                CheckBox c = (CheckBox) view.findViewById(R.id.checkBox);
                if (c.isChecked()) {
                    c.setChecked(false);
                    int pos = ProductsAdded.indexOf(p.getName() + "\n" + p.getPrecio());
                    if (ProductsAdded.contains(p.getName() + "\n" + p.getPrecio()))
                        ProductsAdded.remove(pos);
                        precio = precio - Integer.parseInt(p.getPrecio());
                } else {
                    System.out.print("Primer cop");
                    c.setChecked(true);
                    if (!ProductsAdded.contains(p.getName() + "\n" + p.getPrecio()))
                        ProductsAdded.add(p.getName() + "\n" + p.getPrecio());
                        precio = precio + Integer.parseInt(p.getPrecio());
                }
            }
        });
        lista1.setOnItemLongClickListener(new AdapterView.OnItemLongClickListener() {
            @Override
            public boolean onItemLongClick(AdapterView<?> parent, View view, int position, long id) {
                Toast.makeText(view.getContext(),"item deleted", Toast.LENGTH_LONG).show();
                fb.removeElement(myList.get(position).getId()+"");
                return false;
            }
        });

    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_main, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_settings) {
            return true;
        }
        else if (id == R.id.cesta) {
            Intent intent = new Intent(this, Cesta.class);
            intent.putStringArrayListExtra("lista", ProductsAdded);
            intent.putExtra("preu",precio);
            startActivity(intent);
        }

        return super.onOptionsItemSelected(item);
    }
}
