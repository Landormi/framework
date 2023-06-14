import { useState, useEffect } from "react";
import "./App.css";

import Navbar from './components/Navbar'
import Home from "./pages/Home";
import Recherche from './pages/Recherche'
import source_seismes from "./source_seismes.json";
import { Switch, Route, BrowserRouter } from "react-router-dom";


function App() {
  const [seismes, setSeismes] = useState(null);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    // Todo
    // Obtenir la liste des seismes via API
    setSeismes(source_seismes);
    setLoading(false);
  }, []);

  if (loading) return <p>Patienter ...</p>;

  return (
    <BrowserRouter>
      <Navbar /><br/>
      <div className="container mt-2">
        <Switch>
          <Route exact path="/">
          <div className="App">
      {seismes && <Home seismes={seismes} />}
      <div></div>
    </div>
          </Route>
          <Route path="/recherche">
            <Recherche seismes={seismes}/>
          </Route>
        </Switch>
      </div>
     </BrowserRouter>
    
  );
}

export default App;