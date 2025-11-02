<?php

class pluginFloatingImage extends Plugin {
    
    public function init()
    {
        // Default configuration
        $this->dbFields = array(
            'imageUrl' => '',
            'imageSize' => 150,
            'positionX' => '10',
            'positionY' => '80',
            'zIndex' => 999,
            'opacity' => 0.9
        );
    }

    public function form()
    {
        global $L;
        
        $html = '<div class="alert alert-primary" role="alert">';
        $html .= $L->get('image-url-help');
        $html .= '</div>';
        
        // Image URL field
        $html .= '<div class="mb-3">';
        $html .= '<label class="form-label" for="imageUrl">' . $L->get('image-url') . '</label>';
        $html .= '<input class="form-control" id="imageUrl" name="imageUrl" type="text" value="' . $this->getValue('imageUrl') . '" placeholder="https://example.com/image.gif">';
        $html .= '<div class="form-text">' . $L->get('image-url-help') . '</div>';
        $html .= '</div>';
        
        // Image size field
        $html .= '<div class="mb-3">';
        $html .= '<label class="form-label" for="imageSize">' . $L->get('image-size') . '</label>';
        $html .= '<input class="form-control" id="imageSize" name="imageSize" type="number" value="' . $this->getValue('imageSize') . '" min="50" max="500">';
        $html .= '<div class="form-text">' . $L->get('image-size-help') . '</div>';
        $html .= '</div>';
        
        // Horizontal position
        $html .= '<div class="mb-3">';
        $html .= '<label class="form-label" for="positionX">' . $L->get('position-x') . '</label>';
        $html .= '<input class="form-control" id="positionX" name="positionX" type="text" value="' . $this->getValue('positionX') . '" placeholder="10 (percentage from left)">';
        $html .= '<div class="form-text">' . $L->get('position-x-help') . '</div>';
        $html .= '</div>';
        
        // Vertical position
        $html .= '<div class="mb-3">';
        $html .= '<label class="form-label" for="positionY">' . $L->get('position-y') . '</label>';
        $html .= '<input class="form-control" id="positionY" name="positionY" type="text" value="' . $this->getValue('positionY') . '" placeholder="80 (percentage from top)">';
        $html .= '<div class="form-text">' . $L->get('position-y-help') . '</div>';
        $html .= '</div>';
        
        // Z-Index
        $html .= '<div class="mb-3">';
        $html .= '<label class="form-label" for="zIndex">' . $L->get('z-index') . '</label>';
        $html .= '<input class="form-control" id="zIndex" name="zIndex" type="number" value="' . $this->getValue('zIndex') . '" min="1" max="9999">';
        $html .= '<div class="form-text">' . $L->get('z-index-help') . '</div>';
        $html .= '</div>';
        
        // Opacity
        $html .= '<div class="mb-3">';
        $html .= '<label class="form-label" for="opacity">' . $L->get('opacity') . '</label>';
        $html .= '<input class="form-control" id="opacity" name="opacity" type="number" step="0.1" value="' . $this->getValue('opacity') . '" min="0.1" max="1.0">';
        $html .= '<div class="form-text">' . $L->get('opacity-help') . '</div>';
        $html .= '</div>';
        
        return $html;
    }
    
    public function siteBodyEnd()
    {
        $imageUrl = $this->getValue('imageUrl');
        
        // Don't display anything if no image URL is set
        if (empty($imageUrl)) {
            return false;
        }
        
        $imageSize = $this->getValue('imageSize');
        $positionX = $this->getValue('positionX');
        $positionY = $this->getValue('positionY');
        $zIndex = $this->getValue('zIndex');
        $opacity = $this->getValue('opacity');
        
        $html = '
        <div id="floating-image-container" style="
            position: fixed;
            left: ' . $positionX . '%;
            top: ' . $positionY . '%;
            z-index: ' . $zIndex . ';
            pointer-events: auto;
            cursor: pointer;
            transition: opacity 0.3s ease;
        ">
            <img id="floating-image" 
                src="' . $imageUrl . '" 
                alt="Floating Image" 
                style="
                    width: ' . $imageSize . 'px;
                    height: auto;
                    opacity: ' . $opacity . ';
                    display: block;
                    user-select: none;
                    -webkit-user-drag: none;
                "
            />
        </div>
        
        <script>
        (function() {
            var container = document.getElementById("floating-image-container");
            var image = document.getElementById("floating-image");
            
            if (container && image) {
                // Double-click to close
                container.addEventListener("dblclick", function(e) {
                    e.preventDefault();
                    container.style.opacity = "0";
                    setTimeout(function() {
                        container.style.display = "none";
                    }, 300);
                });
                
                // Optional: Add visual feedback on hover
                container.addEventListener("mouseenter", function() {
                    image.style.opacity = "1";
                });
                
                container.addEventListener("mouseleave", function() {
                    image.style.opacity = "' . $opacity . '";
                });
            }
        })();
        </script>
        ';
        
        echo $html;
    }
}

?>
