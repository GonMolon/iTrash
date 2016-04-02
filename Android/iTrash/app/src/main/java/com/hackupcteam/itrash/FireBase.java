package com.hackupcteam.itrash;

import android.content.Context;
import android.widget.TextView;

import com.firebase.client.DataSnapshot;
import com.firebase.client.Firebase;
import com.firebase.client.FirebaseError;
import com.firebase.client.ValueEventListener;

/**
 * Created by Marc on 02/04/2016.
 */
public class FireBase {

    private Context context;

    public FireBase (Context c){
        context = c;
    }

    public void realTimeText(final TextView t1){
        Firebase.setAndroidContext(context);
        Firebase myFirebaseRef = new Firebase("https://itrashtest.firebaseio.com/test1");
        myFirebaseRef.addValueEventListener(new ValueEventListener() {
            @Override
            public void onDataChange(DataSnapshot dataSnapshot) {
                t1.setText((String)dataSnapshot.getValue());
                //hola que tal
            }

            @Override
            public void onCancelled(FirebaseError firebaseError) {

            }
        });
    }


}
