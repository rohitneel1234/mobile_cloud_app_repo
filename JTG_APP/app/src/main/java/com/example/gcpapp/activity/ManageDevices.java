package com.example.gcpapp.activity;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

import com.example.gcpapp.R;
import com.example.gcpapp.helper.SessionManager;
import com.google.android.material.floatingactionbutton.FloatingActionButton;
import com.kosalgeek.asynctask.AsyncResponse;
import com.kosalgeek.asynctask.PostResponseAsyncTask;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;

public class ManageDevices extends AppCompatActivity implements AsyncResponse {

    private FloatingActionButton button;
    private String UserId;
    private String emailAddress;
    private SessionManager sessionManager;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_manage_devices);

        button = findViewById(R.id.floatingActionButton);

        sessionManager = new SessionManager(getApplicationContext());

        HashMap<String, String> user = sessionManager.getUserDetails();
        emailAddress = user.get(SessionManager.KEY_NAME);

        String uid = UserId;

        button.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                HashMap<String, String> postData = new HashMap<String, String>();
                postData.put("txtEmail", emailAddress);
                PostResponseAsyncTask task =
                        new PostResponseAsyncTask(ManageDevices.this, postData, ManageDevices.this);
                task.execute("https://vast-service-281617.uc.r.appspot.com/getUserInformation.php");
            }
        });
    }

    @Override
    public void processFinish(String s) {
        try {
            JSONArray jsonArray = new JSONArray(s);
            for (int i = 0; i < jsonArray.length(); i++) {
                JSONObject jsonobject = jsonArray.getJSONObject(i);
                UserId = jsonobject.getString("id");
            }
        } catch (JSONException e) {
            e.printStackTrace();
        }
        Intent intent = new Intent(getApplicationContext(),AddTargetDevice.class);
        intent.putExtra("userId", UserId);
        startActivity(intent);
    }
}