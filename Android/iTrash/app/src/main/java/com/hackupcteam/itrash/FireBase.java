package com.hackupcteam.itrash;

import android.content.Context;
import android.widget.ListAdapter;
import android.widget.ListView;
import android.widget.TextView;

import com.firebase.client.DataSnapshot;
import com.firebase.client.Firebase;
import com.firebase.client.FirebaseError;
import com.firebase.client.ValueEventListener;

import java.util.ArrayList;
import java.util.Objects;

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
                System.out.println("There are " +dataSnapshot.getChildrenCount() + " blog posts");
                Product p;
                myList.clear();
                for (DataSnapshot postSnapshot : dataSnapshot.getChildren()) {
                    String key = postSnapshot.getKey();
                    System.out.print(key+"\n");

                    p = new Product(1,"a",null,null,null);
                    myList.add(p);

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
