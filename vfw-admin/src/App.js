//import logo from './logo.svg';
import './App.css';
import './assets/styles/bootstrap.min.css';
import Navbar from './Navbar';
import Header from './Header';
import {BrowserRouter as Router, Route, Switch} from 'react-router-dom';
import Contact from './Contact';
function App() {
  return (
   // <Navbar />
   <Router>
       <Navbar />
     <Switch>
     <Route exact path="/">
       <h1>Home</h1>
       </Route>
       <Route  path="/header">
       <Header />
       </Route>
       <Route path="/Contact">
      <Contact />
       </Route>
     </Switch>
     </Router>

  );
}

export default App;
