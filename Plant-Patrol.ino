#include <ESP8266WiFi.h>                                                    // esp8266 library
#include <FirebaseArduino.h>                                                // firebase library
#include <ESP8266HTTPClient.h>                                              // esp8266 HTTP library

#define FIREBASE_HOST "plant-patrol.firebaseio.com"                          // the project name address from firebase id
#define FIREBASE_AUTH "wtoUWqg0taVveEsCesrMs65XNNGUStlQ3Lerc3zv"            // the secret key generated from firebase

#define WIFI_SSID "H369A4B904D"                                             // input your home or public wifi name 
#define WIFI_PASSWORD "2535A7999F57"                                        //password of wifi ssid
 
int sensorPin = A0;
int sensorValue = 0;
int sensorReference = 0;
String ipadress = "192.168.2.23";



void setup() {
  pinMode(LED_BUILTIN, OUTPUT); // setup status led
  pinMode(D6, OUTPUT);          // button output 
  pinMode(D7, INPUT_PULLUP);    // button input
  
  Serial.begin(9600);
  delay(1000);                
  WiFi.begin(WIFI_SSID, WIFI_PASSWORD);                                     //try to connect with wifi
  Serial.print("Connecting to ");
  Serial.print(WIFI_SSID);
  while (WiFi.status() != WL_CONNECTED) {
    Serial.print(".");
    delay(500);
  }
  Serial.println();
  Serial.print("Connected to ");
  Serial.println(WIFI_SSID);
  Serial.print("IP Address is : ");
  Serial.println(WiFi.localIP());                                            // print local IP address
  Firebase.begin(FIREBASE_HOST, FIREBASE_AUTH);                              // connect to firebase
}

void loop() {
  // check for calibration
  if (digitalRead(D7) == LOW) {
    sensorReference = analogRead(sensorPin);                                 // set current moisture as reference 
  }

  HTTPClient http; 
  http.begin("http://" + String(ipadress) + "/php/status.txt");                                                  
  int httpCode = http.GET();                                                                                                                        
  String payload = http.getString();                                                                                                                                                                                                         // Print the payload to the serial debug
  http.end();

  if (payload == "1") {
    digitalWrite(LED_BUILTIN, LOW); // turn the led on

    // read the value from the sensor:
    sensorValue = analogRead(sensorPin);
    Serial.print("Moisture = " );
    Serial.println(sensorValue - sensorReference);
    delay(500);

    Firebase.setInt("Moisture", (sensorValue - sensorReference));                                       //setup path and send readings
  } (payload == "0"); {
    digitalWrite(LED_BUILTIN, HIGH); // turn the led off
  }
}
