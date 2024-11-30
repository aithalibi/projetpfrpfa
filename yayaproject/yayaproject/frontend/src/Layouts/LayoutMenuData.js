import React, { useEffect, useState } from "react";
import { useNavigate } from "react-router-dom";

const Navdata = () => {

    const history = useNavigate();
    const [isApps, setIsApps] = useState(false);
    const [isForms, setIsForms] = useState(false);
    const [isTables, setIsTables] = useState(false);
    const [iscurrentState, setIscurrentState] = useState('Dashboard');

    function updateIconSidebar(e) {
        if (e && e.target && e.target.getAttribute("subitems")) {
            const ul = document.getElementById("two-column-menu");
            const iconItems = ul.querySelectorAll(".nav-icon.active");
            let activeIconItems = [...iconItems];
            activeIconItems.forEach((item) => {
                item.classList.remove("active");
                var id = item.getAttribute("subitems");
                if (document.getElementById(id))
                    document.getElementById(id).classList.remove("show");
            });
        }
    }

    useEffect(() => {

        document.body.classList.remove('twocolumn-panel');
    
        if (iscurrentState !== 'Apps') {
            setIsApps(false);
        }
        
        if (iscurrentState !== 'Forms') {
            setIsForms(false);
        }
        if (iscurrentState !== 'Tables') {
            setIsTables(false);
        }
    }, [
        history,
        iscurrentState,
        isApps,
        isForms,
        isTables,
    ]);

    const menuItems = [
        {
            label: "Menu",
            isHeader: true,
        },

        {
            id: 4,
            label: "Application",
            icon: "ri-rocket-line",
            link: "/apps-job-application",
            parentId: "apps",
        },
                {
                    id: "appsprojects",
                    icon: "ri-pages-line",
                    label: "Correction rapport",
                    link: "/apps-projects-create",
                    parentId:"apps",
                },
                
                {
                    id: "mailbox",
                    icon: "ri-pencil-ruler-2-line",
                    label: "Email",
                    link: "/apps-mailbox",
                    parentId: "apps",
                },
                
    
    ];
    return <React.Fragment>{menuItems}</React.Fragment>;
};
export default Navdata;