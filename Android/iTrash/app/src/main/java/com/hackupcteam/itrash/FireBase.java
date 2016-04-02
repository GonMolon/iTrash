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
                System.out.println("There are " + dataSnapshot.getChildrenCount() + " blog posts");
                Product p;
                myList.clear();
                int id = -1;
                String name = "CACA";
                String marca;
                String link;
                String precio;
                for (DataSnapshot postSnapshot : dataSnapshot.getChildren()) {
                    String key = postSnapshot.getKey();
                    for(DataSnapshot postpost : postSnapshot.getChildren()){
                        String k = postpost.getKey();
                        System.out.print(k+"\n");
                        name = postpost.getValue(String.class);
                        map.put(k,name);
                    }

                    p = new Product(new Integer(map.get("ean")),map.get("time"),map.get("ean"),map.get("smallImageURL"),map.get("smallImageURL"));
                    myList.add(p);
                    map.clear();

                }

                listView.setAdapter(adapter);
                System.out.print(dataSnapshot.toString()+"\n");
            }

            @Override
            public void onCancelled(FirebaseError firebaseError) {

            }
        });
    }


}
