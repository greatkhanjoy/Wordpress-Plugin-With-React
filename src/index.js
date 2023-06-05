import React, { useState, useEffect } from "react";
import ReactDOM from "react-dom";
import "./index.scss";

document.addEventListener("DOMContentLoaded", function () {
  ReactDOM.render(
    <Admin />,
    document.getElementById("greatkhanjoy-complete-render")
  );
});

const Admin = () => {
  return (
    <div class="flex min-h-[80vh]">
      <div class="w-[150px] sm:w-[300px] bg-gray-800 text-white flex flex-col justify-between">
        <div class="p-1 sm:p-4">
          <h2 class="text-2xl font-semibold mb-6 text-white">
            Greatkhanjoy Complete
          </h2>
          <ul className="divide-y divide-gray-600">
            <li>
              <a
                href="/"
                class="block py-2 px-4 rounded hover:bg-gray-700 hover:text-white focus:text-white"
              >
                General
              </a>
            </li>
            <li>
              <a
                href="/settings"
                class="block py-2 px-4 rounded hover:bg-gray-700 hover:text-white focus:text-white"
              >
                Settings
              </a>
            </li>
            <li>
              <a
                href="/license"
                class="block py-2 px-4 rounded hover:bg-gray-700 hover:text-white focus:text-white"
              >
                License
              </a>
            </li>
          </ul>
        </div>
        <div className="p-1 sm:p-4 flex flex-col sm:flex-row gap-1 items-center">
          <span className="text-white">Developed By:</span>
          <a href="https://greatkhanjoy.me">Greatkhanjoy</a>
        </div>
      </div>

      <div class="w-full bg-white p-8"></div>
    </div>
  );
};
