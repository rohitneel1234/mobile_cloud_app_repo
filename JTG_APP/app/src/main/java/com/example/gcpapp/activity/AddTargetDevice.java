package com.example.gcpapp.activity;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.example.gcpapp.R;
import com.example.gcpapp.helper.SessionManager;
import com.kosalgeek.asynctask.AsyncResponse;
import com.kosalgeek.asynctask.PostResponseAsyncTask;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;

public class AddTargetDevice extends AppCompatActivity implements AsyncResponse {

    private EditText etTargetName;
    private EditText etTargetId;
    private Button btnAdd;
    private String UserId;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_add_target_device);

        etTargetName = findViewById(R.id.etTargetName);
        etTargetId =  findViewById(R.id.etTargetId);
        btnAdd = findViewById(R.id.btnAdd);

        Bundle extras = getIntent().getExtras();

        if (extras != null) {
            UserId = extras.getString("userId");
        }

        btnAdd.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                HashMap<String, String> postData = new HashMap<String, String>();
                postData.put("txtTargetName", etTargetName.getText().toString());
                postData.put("txtTargetId", etTargetId.getText().toString());
                postData.put("txtUserId", UserId);
                PostResponseAsyncTask loginTask =
                        new PostResponseAsyncTask(AddTargetDevice.this, postData, AddTargetDevice.this);
                loginTask.execute("https://vast-service-281617.uc.r.appspot.com/addTargetDevice.php");
            }
        });
    }

    @Override
    public void processFinish(String s)
    {
        if(s.equals("success"))
        {
            Toast.makeText(getApplicationContext(),"Target Name Added Successfully", Toast.LENGTH_SHORT).show();
        }
        else
        {
            Toast.makeText(getApplicationContext(),s+"Target Name Already Exist", Toast.LENGTH_SHORT).show();
        }
    }
}