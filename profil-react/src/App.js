import React from 'react';
import './App.css';
import User from './User';
import Image from './Image';
//import Login from './Login';
import {
  BrowserRouter as Router,
  Switch,
  Route,
  Redirect,
  } from "react-router-dom";


function App() {

  return (
    <div className="App">
    <Router>
      <Switch>
        <Route path="/profil">
          <User/>
        </Route>
        <Route path="/image">
          <Image/>
        </Route>
        
        <Route path="/">
            <Redirect to="/profil"/>
        </Route>
      </Switch>
    </Router>

    </div>
  );
}

export default App;
