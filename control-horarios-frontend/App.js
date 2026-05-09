import { StatusBar } from 'expo-status-bar';
import { StyleSheet, Text, View } from 'react-native';
import React, {useState, useEffect} from 'react';




export default function App() {
  

  const [users, setUsers] = useState([]);

  useEffect(() => {
    getData();
  }, []);

  function getData() {
    fetch('http://192.168.182.64:8000/api/users')
      .then(response => response.json())
      .then(data => setUsers(data))
      .catch(error => console.error(error));
  }

  function sendData() {
    fetch('http://192.168.182.64:8080/api/users', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(data),
    })
      .then(response => response.json())
      .then(data => console.log(data))
      .catch(error => console.error(error));
  }


  return (
    <View style={styles.container}>
      <Text style={styles.title}>Fetched Users Data:</Text>
      <Text style={styles.dataText}>{JSON.stringify(users, null, 2)}</Text>
      <StatusBar style="auto" />
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#fff',
    paddingTop: 50,
    paddingHorizontal: 20,
  },
  title: {
    fontSize: 20,
    fontWeight: 'bold',
    marginBottom: 20,
  },
  dataText: {
    fontSize: 14,
    fontFamily: 'monospace',
  },
});
