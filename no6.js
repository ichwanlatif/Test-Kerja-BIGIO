const hasCycle = function(head) {
    let twoStep = head;
    let oneStep = head;
    
    while(twoStep !== null && twoStep.next !== null){
        twoStep = twoStep.next.next;
        oneStep = oneStep.next;
    }

    if(oneStep === twoStep){
        return 1;
    }

    return 0;
};