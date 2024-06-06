function animateBg(px=0){
    requestAnimationFrame(()=>{
        document.body.style.backgroundPosition = `${px}px 0px`;
        animateBg(px+0.5);
    });
}
animateBg();