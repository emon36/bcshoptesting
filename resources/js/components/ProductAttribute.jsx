import React from 'react';
import ReactDOM from 'react-dom/client';
import { useState } from 'react';


function Example() {
    const [attributes, setAttributes] = useState([{ name: '', value: '' }]);

    const handleAttributeChange = (index, event) => {
        const newAttributes = [...attributes];
        newAttributes[index][event.target.name] = event.target.value;
        setAttributes(newAttributes);
    };

    const handleAddAttribute = () => {
        setAttributes([...attributes, { name: '', value: '' }]);
    };

    const handleRemoveAttribute = (index) => {
        const newAttributes = [...attributes];
        newAttributes.splice(index, 1);
        setAttributes(newAttributes);
    };

    return (
        <div>
            {attributes.map((attribute, index) => (
                <div key={index}>
                    <input
                        type="text"
                        name="name"
                        value={attribute.name}
                        onChange={(event) => handleAttributeChange(index, event)}
                    />
                    <input
                        type="text"
                        name="value"
                        value={attribute.value}
                        onChange={(event) => handleAttributeChange(index, event)}
                    />
                    <button onClick={() => handleRemoveAttribute(index)}>Remove</button>
                </div>
            ))}
            <button onClick={handleAddAttribute}>Add Attribute</button>
        </div>
    );
}

export default Example;

if (document.getElementById('attribute')) {
    const Index = ReactDOM.createRoot(document.getElementById("attribute"));

    Index.render(
        <React.StrictMode>
            <Example/>
        </React.StrictMode>
    )
}
