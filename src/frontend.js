import "./frontend.scss";
import { useState, useEffect } from "react";
import ReactDOM from "react-dom";
import PopupOne from "./components/popups/PopupOne";
import PopupTwo from "./components/popups/PopupTwo";

document.addEventListener("DOMContentLoaded", function () {
  ReactDOM.render(
    <Survey />,
    document.getElementById("greatkhanjoy-complete-render")
  );
});

const Survey = () => {
  const [isMenuOpen, setMenuOpen] = useState(false);

  const toggleMenu = () => {
    setMenuOpen(!isMenuOpen);
  };

  const [popup, setPopup] = useState(null);

  const [isModalOpen, setModalOpen] = useState(false);

  const openModal = (id) => {
    setModalOpen(true);
    setPopup(id);
  };

  const closeModal = () => {
    setModalOpen(false);
  };

  return (
    <>
      <div className={`floating-button z-10 ${isMenuOpen ? "open" : ""}`}>
        <button
          className="menu-toggle flex items-center justify-center bg-blue-400 text-white p-5 w-16 h-16 leading-normal rounded-full text-[16px] text-center cursor-pointer hover:bg-blue-500 transition-all duration-300 ease-in-out"
          onClick={toggleMenu}
        >
          {isMenuOpen ? "Close" : "Menu"}
        </button>

        <div
          className={`menu-container ${
            isMenuOpen && "open"
          } fixed bottom-[70px] right-[20px] w-[120px]`}
        >
          <div className="menu bg-slate-800 p-3 rounded-md shadow-md shadow-gray-400">
            <ul className="list-none">
              <li
                className="text-white mb-3 hover:text-purple-300"
                onClick={() => openModal(1)}
              >
                Form One
              </li>
              <li
                className="text-white mb-3 hover:text-purple-300"
                onClick={() => openModal(2)}
              >
                Form Two
              </li>
              <li
                className="text-white mb-3 hover:text-purple-300"
                onClick={() => openModal(3)}
              >
                Menu Item 3
              </li>
              <li
                className="text-white mb-3 hover:text-purple-300"
                onClick={() => openModal(4)}
              >
                Menu Item 4
              </li>
            </ul>
          </div>
        </div>
      </div>
      {/* <button
        className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
        onClick={openModal}
      >
        Open Modal
      </button> */}

      {isModalOpen && (
        <div className="fixed inset-0 flex items-center justify-center z-20">
          <div className="fixed inset-0 bg-gray-800 opacity-50"></div>
          <div className="bg-white w-2/3 p-6 rounded shadow-lg z-50">
            {popup === 1 && <PopupOne onClick={closeModal} />}
            {popup === 2 && <PopupTwo />}
            <button
              className="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
              onClick={closeModal}
            >
              Close
            </button>
          </div>
        </div>
      )}
    </>
  );
};
