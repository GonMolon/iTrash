package com.hackupcteam.itrash;

import android.content.Context;
import android.provider.ContactsContract;
import android.support.annotation.NonNull;
import android.widget.ListAdapter;
import android.widget.ListView;
import android.widget.TextView;

import com.firebase.client.DataSnapshot;
import com.firebase.client.Firebase;
import com.firebase.client.FirebaseError;
import com.firebase.client.ValueEventListener;

import java.util.ArrayList;
import java.util.Collection;
import java.util.Collections;
import java.util.Comparator;
import java.util.HashMap;
import java.util.Map;
import java.util.Objects;
import java.util.Set;

/**
 * Created by Marc on 02/04/2016.
 */
public class FireBase {

    private Context context;
    private Firebase myFirebaseRef;
    private ArrayList<Product> myList;

    public FireBase (Context c, ArrayList<Product> p){
        context = c;
        Firebase.setAndroidContext(c);
        myFirebaseRef = new Firebase("https://itrashtest.firebaseio.com/");
        myFirebaseRef.orderByChild("time");//En teoria ordena
        myList = p;


    }

    public void realTimeText(final ListAdapter adapter, final ListView listView){
        Firebase.setAndroidContext(context);
        myFirebaseRef.orderByChild("time");//En teoria ordena
        myFirebaseRef.addValueEventListener(new ValueEventListener() {
            @Override
            public void onDataChange(DataSnapshot dataSnapshot) {
                Map<String,String> map = new HashMap<String, String>();
                //System.out.println("There are " + dataSnapshot.getChildrenCount() + " blog posts");
                Product p;
                myList.clear();
                int id = -1;
                String name = "CACA";
                //String marca;
                //String link;
                //String precio;
                for (DataSnapshot postSnapshot : dataSnapshot.getChildren()) {
                    String key = postSnapshot.getKey();
                    for(DataSnapshot postpost : postSnapshot.getChildren()){
                        String k = postpost.getKey();
                        //System.out.print(k+"\n");
                        name = postpost.getValue(String.class);
                        map.put(k,name);
                    }
                    //EDITAR ID----------------------------------------------
                    if(!map.containsKey("smallImageURL")){
                        map.put("smallImageURL","http://clickefectivo.com/wp-content/uploads/2015/12/Cortana-1200-80-700x394-240x240.jpg");
                    }
                    if(!map.containsKey("time")){
                        map.put("time","999999999999999999999999999");
                    }
                    p = new Product(1,map.get("name"),map.get("ean"),map.get("smallImageURL"),map.get("price"),map.get("time"));
                    myList.add(p);
                    map.clear();

                }

                Collections.sort(myList, new Comparator<Product>() {
                    @Override
                    public int compare(Product p1, Product p2) {
                        String s1 = p1.getTime();
                        String s2 = p2.getTime();
                        return s2.compareToIgnoreCase(s1);
                    }
                });

                listView.setAdapter(adapter);
                //System.out.print(dataSnapshot.toString()+"\n");
            }

            @Override
            public void onCancelled(FirebaseError firebaseError) {

            }
        });
    }


}
