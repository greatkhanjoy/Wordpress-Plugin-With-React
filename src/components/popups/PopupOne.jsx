import React from "react";

const PopupOne = ({ onClick }) => {
  return (
    <div className="w-full relative">
      <div
        onClick={onClick}
        className="absolute -top-9 -right-9 w-8 h-8 text-center rounded-full bg-red-500 text-white cursor-pointer"
      >
        x
      </div>
      <div>
        <h2 className="text-center text-4xl ">Popup Modal One</h2>
        <p className="mb-4">
          This is a popup modal created using React and Tailwind CSS.
        </p>
      </div>
    </div>
  );
};

export default PopupOne;
