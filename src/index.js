import React, { useState, useEffect } from "react";
import ReactDOM from "react-dom";
import {
  BrowserRouter as Router,
  HashRouter,
  Routes,
  Route,
  Link,
} from "react-router-dom";
import "./index.scss";
import General from "./screens/General";
import Settings from "./screens/Settings";
import License from "./screens/License";

document.addEventListener("DOMContentLoaded", function () {
  ReactDOM.render(
    <Admin />,
    document.getElementById("greatkhanjoy-complete-render")
  );
});

const Admin = () => {
  return (
    <HashRouter>
      <div class="flex min-h-[80vh]">
        <div class="w-[150px] sm:w-[300px] bg-gray-800 text-white flex flex-col justify-between">
          <div class="p-1 sm:p-4">
            <h2 class="text-2xl font-semibold mb-6 text-white">
              Greatkhanjoy Complete
            </h2>
            <ul className="divide-y divide-gray-600">
              <li>
                <Link
                  to="/"
                  class="block py-2 px-4 rounded hover:bg-gray-700 hover:text-white focus:text-white"
                >
                  General
                </Link>
              </li>
              <li>
                <Link
                  to="/settings"
                  class="block py-2 px-4 rounded hover:bg-gray-700 hover:text-white focus:text-white"
                >
                  Settings
                </Link>
              </li>
              <li>
                <Link
                  to="/license"
                  class="block py-2 px-4 rounded hover:bg-gray-700 hover:text-white focus:text-white"
                >
                  License
                </Link>
              </li>
            </ul>
          </div>
          <div className="p-1 sm:p-4 flex flex-col sm:flex-row gap-1 items-center">
            <span className="text-white">Developed By:</span>
            <a href="https://greatkhanjoy.me">Greatkhanjoy</a>
          </div>
        </div>

        <div class="w-full bg-white p-8">
          <Routes>
            <Route index element={<General />} />
            <Route path="settings" element={<Settings />} />
            <Route path="license" element={<License />} />
          </Routes>
        </div>
      </div>
    </HashRouter>
  );
};
