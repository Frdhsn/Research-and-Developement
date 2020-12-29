;include 'emu8086.inc'
DATA SEGMENT
    ;haha db 'hahavodox','$'
CODE SEGMENT
    print    MACRO c  
            push    ax
            mov     al, c
            mov     ah, 0x0E
            int     0x10     
            pop     ax
    ENDM
    ;mov ax,48
    mov al, 48
    print al
